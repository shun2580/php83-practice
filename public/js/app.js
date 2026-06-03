'use strict';

const App = {
    problems: [],
    current: null,
    solved: {},   // id -> 'pass' | 'fail'
    filters: { level: 'all', genre: 'all', type: 'all', search: '' },
    hintShown: {},

    async init() {
        this.loadSolved();
        const res = await fetch('/api/problems.php');
        const data = await res.json();
        this.problems = data.problems;
        this.buildFilters(data.genres, data.levels);
        this.renderList();
        if (this.problems.length > 0) this.loadProblem(this.problems[0].id);
    },

    loadSolved() {
        try {
            const saved = localStorage.getItem('php83-solved');
            this.solved = saved ? JSON.parse(saved) : {};
        } catch {
            this.solved = {};
        }
    },

    saveSolved() {
        try {
            localStorage.setItem('php83-solved', JSON.stringify(this.solved));
        } catch {}
    },

    buildFilters(genres, levels) {
        const sel = (id, items, all) => {
            const el = document.getElementById(id);
            el.innerHTML = `<option value="all">${all}</option>` +
                items.map(v => `<option value="${v}">${v}</option>`).join('');
            el.addEventListener('change', () => {
                this.filters[id.replace('filter-', '')] = el.value;
                this.renderList();
            });
        };
        sel('filter-level', levels, 'すべてのレベル');
        sel('filter-genre', genres, 'すべてのジャンル');
        sel('filter-type', ['choice', 'text', 'coding'], 'すべての種類');
        document.getElementById('filter-type').innerHTML =
            `<option value="all">すべての種類</option>
             <option value="choice">選択問題</option>
             <option value="text">記述式</option>
             <option value="coding">コーディング</option>`;
        document.getElementById('filter-type').addEventListener('change', e => {
            this.filters.type = e.target.value;
            this.renderList();
        });

        const searchEl = document.getElementById('search-input');
        if (searchEl) {
            searchEl.addEventListener('input', e => {
                this.filters.search = e.target.value.toLowerCase();
                this.renderList();
            });
        }
    },

    filtered() {
        const q = this.filters.search;
        return this.problems.filter(p => {
            if (this.filters.level !== 'all' && p.level !== this.filters.level) return false;
            if (this.filters.genre !== 'all' && p.genre !== this.filters.genre) return false;
            if (this.filters.type  !== 'all' && p.type  !== this.filters.type)  return false;
            if (q && !p.title.toLowerCase().includes(q) && !p.id.toLowerCase().includes(q)) return false;
            return true;
        });
    },

    renderList() {
        const list = document.getElementById('problem-list');
        const probs = this.filtered();
        const solved = Object.values(this.solved).filter(v => v === 'pass').length;
        const total  = this.problems.length;

        document.getElementById('progress-fill').style.width = total ? (solved / total * 100) + '%' : '0%';
        document.getElementById('progress-label').textContent = `正解 ${solved} / ${total}`;

        if (probs.length === 0) {
            list.innerHTML = '<p style="padding:16px;font-size:13px;color:var(--text3)">条件に合う問題がありません</p>';
            return;
        }

        list.innerHTML = probs.map(p => {
            const s = this.solved[p.id];
            const active = this.current?.id === p.id ? ' active' : '';
            const solvedClass = s === 'pass' ? ' solved' : '';
            return `<div class="problem-item${active}${solvedClass}" onclick="App.loadProblem('${p.id}')">
                <div class="problem-item-title">${this.esc(p.title)}</div>
                <div class="problem-item-meta">
                    ${this.levelBadge(p.level)}
                    ${this.typeBadge(p.type)}
                </div>
            </div>`;
        }).join('');
    },

    async loadProblem(id) {
        const p = this.problems.find(x => x.id === id);
        if (!p) return;
        this.current = p;
        this.renderList();
        this.renderProblem(p);
    },

    renderProblem(p) {
        const main = document.getElementById('main-content');
        main.innerHTML = '';

        const { prev, next } = this.getAdjacentIds();
        const card = document.createElement('div');
        card.className = 'problem-card';
        card.innerHTML = `
            <div class="problem-meta">
                ${this.levelBadge(p.level)}
                ${this.typeBadge(p.type)}
                <span class="badge badge-genre">${this.esc(p.genre)}</span>
                <span style="margin-left:auto;font-size:12px;color:var(--text3)">${p.id.toUpperCase()}</span>
            </div>
            <div class="problem-title">${this.esc(p.title)}</div>
            <div class="problem-question">${this.esc(p.question)}</div>
            ${p.type === 'coding' && p.examples ? this.renderExamples(p.examples, p.constraints) : ''}
            ${this.renderAnswer(p)}
            <div class="btn-row">
                <button class="btn btn-primary" onclick="App.submit()">採点する</button>
                ${p.type === 'coding' ? `<button class="btn btn-run" onclick="App.runCode()">実行する</button>` : ''}
                <button class="btn btn-sm" onclick="App.resetAnswer()">リセット</button>
                ${p.hint ? `<button class="hint-toggle" onclick="App.toggleHint()">ヒントを見る</button>` : ''}
            </div>
            ${p.hint ? `<div class="hint-box" id="hint-box">${this.esc(p.hint)}</div>` : ''}
            <div id="result-area"></div>
            <div class="nav-row">
                ${prev ? `<button class="btn btn-sm" onclick="App.loadProblem('${prev}')">← 前の問題</button>` : '<span></span>'}
                ${next ? `<button class="btn btn-sm" onclick="App.loadProblem('${next}')">次の問題 →</button>` : '<span></span>'}
            </div>
        `;
        main.appendChild(card);
        this.initCodeEditor();
    },

    getAdjacentIds() {
        const filtered = this.filtered();
        const idx = filtered.findIndex(p => p.id === this.current?.id);
        return {
            prev: idx > 0 ? filtered[idx - 1].id : null,
            next: idx < filtered.length - 1 ? filtered[idx + 1].id : null,
        };
    },

    initCodeEditor() {
        const editor = document.getElementById('code-editor');
        if (!editor) return;
        editor.addEventListener('keydown', e => {
            if (e.key !== 'Tab') return;
            e.preventDefault();
            const start = editor.selectionStart;
            const end = editor.selectionEnd;
            editor.value = editor.value.substring(0, start) + '    ' + editor.value.substring(end);
            editor.selectionStart = editor.selectionEnd = start + 4;
        });
    },

    renderExamples(examples, constraints) {
        const constraintsHtml = (constraints && constraints.length)
            ? `<div class="constraints-box">
                <div class="constraints-title">前提</div>
                <div class="constraints-body">${constraints.map(c => `<div class="constraint-item">${this.esc(c)}</div>`).join('')}</div>
               </div>`
            : '';
        return `<div class="examples">
            <div class="examples-title">解答例</div>
            ${examples.map((ex, i) => `
            <div class="example-card">
                <div class="example-num">例${i + 1}:</div>
                <div class="example-body">
                    <div class="example-line"><span class="example-key">入力:</span> <code class="example-val">${this.esc(ex.input_label || ex.input)}</code></div>
                    <div class="example-line"><span class="example-key">出力:</span> <code class="example-val">${this.esc(ex.output)}</code></div>
                    ${ex.explanation ? `<div class="example-line example-explain-line"><span class="example-key">説明:</span> <span class="example-explain">${this.esc(ex.explanation)}</span></div>` : ''}
                </div>
            </div>`).join('')}
            ${constraintsHtml}
        </div>`;
    },

    renderAnswer(p) {
        if (p.type === 'choice') {
            const choices = Object.entries(p.choices).map(([k, v]) =>
                `<button class="choice-btn" data-key="${k}" onclick="App.selectChoice('${k}')">
                    <span class="choice-key">${k}</span>
                    <span>${this.esc(v)}</span>
                </button>`
            ).join('');
            return `<div class="choices" id="answer-area">${choices}</div>`;
        }
        if (p.type === 'text') {
            return `<div id="answer-area">
                <textarea class="text-answer" id="text-answer" placeholder="ここに回答を入力してください..."></textarea>
            </div>`;
        }
        if (p.type === 'coding') {
            return `<div id="answer-area">
                <div class="editor-label">PHP コード</div>
                <textarea class="code-editor" id="code-editor" spellcheck="false">${this.esc(p.starter || '')}</textarea>
                <div id="run-output"></div>
            </div>`;
        }
        return '';
    },

    selectChoice(key) {
        document.querySelectorAll('.choice-btn').forEach(btn => btn.classList.remove('selected'));
        const btn = document.querySelector(`.choice-btn[data-key="${key}"]`);
        if (btn) btn.classList.add('selected');
    },

    getAnswer() {
        const p = this.current;
        if (!p) return null;
        if (p.type === 'choice') {
            const sel = document.querySelector('.choice-btn.selected');
            return sel ? sel.dataset.key : '';
        }
        if (p.type === 'text') {
            return (document.getElementById('text-answer')?.value || '').trim();
        }
        if (p.type === 'coding') {
            return document.getElementById('code-editor')?.value || '';
        }
        return '';
    },

    resetAnswer() {
        const p = this.current;
        if (!p) return;
        if (p.type === 'coding') {
            const el = document.getElementById('code-editor');
            if (el) el.value = p.starter || '';
        } else if (p.type === 'text') {
            const el = document.getElementById('text-answer');
            if (el) el.value = '';
        } else {
            document.querySelectorAll('.choice-btn').forEach(b => {
                b.classList.remove('selected', 'correct', 'wrong');
                b.onclick = () => App.selectChoice(b.dataset.key);
            });
        }
        document.getElementById('result-area').innerHTML = '';
        const runOut = document.getElementById('run-output');
        if (runOut) runOut.innerHTML = '';
    },

    async runCode() {
        const code = document.getElementById('code-editor')?.value || '';
        const btn = document.querySelector('.btn-run');
        if (btn) { btn.textContent = '実行中...'; btn.disabled = true; }

        try {
            const res = await fetch('/api/run.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: this.current?.id, code }),
            });
            const data = await res.json();
            const area = document.getElementById('run-output');
            if (area) {
                area.innerHTML = `
                    <div class="run-output-box${data.hasError ? ' run-output-error' : ''}">
                        <div class="run-output-label">▶ 実行結果</div>
                        <pre class="run-output-pre">${this.esc(data.output)}</pre>
                    </div>`;
                area.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        } catch (e) {
            const area = document.getElementById('run-output');
            if (area) area.innerHTML = '<p style="color:var(--danger);padding:8px 0">実行できませんでした</p>';
        } finally {
            if (btn) { btn.textContent = '実行する'; btn.disabled = false; }
        }
    },

    async submit() {
        const p = this.current;
        if (!p) return;
        const answer = this.getAnswer();
        if (answer === '' || answer === null) {
            alert('回答を入力してください');
            return;
        }

        const btn = document.querySelector('.btn-primary');
        btn.textContent = '採点中...';
        btn.disabled = true;

        try {
            const res = await fetch('/api/judge.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: p.id, answer }),
            });
            const data = await res.json();
            this.solved[p.id] = data.passed ? 'pass' : 'fail';
            this.saveSolved();
            this.renderList();
            this.showResult(data, p);

            if (p.type === 'choice') this.highlightChoices(data, answer);
        } catch (e) {
            document.getElementById('result-area').innerHTML =
                '<p style="color:var(--danger);padding:12px">エラーが発生しました</p>';
        } finally {
            btn.textContent = '採点する';
            btn.disabled = false;
        }
    },

    showResult(data, p) {
        const area = document.getElementById('result-area');
        const passed = data.passed;
        const icon = passed ? '✓ 正解！' : '✗ 不正解';

        const items = (data.results || []).map(r =>
            `<div class="result-item ${r.pass ? 'result-item-pass' : 'result-item-fail'}">
                <span>${r.pass ? '✓' : '✗'}</span>
                <span>${this.esc(r.msg)}</span>
            </div>`
        ).join('');

        const exp = data.explanation
            ? `<div class="explanation-box"><strong>解説:</strong> ${this.esc(data.explanation)}</div>`
            : '';

        const model = data.model_answer && !passed
            ? `<div class="explanation-box" style="margin-top:8px"><strong>模範解答:</strong><br>${this.esc(data.model_answer)}</div>`
            : '';

        area.innerHTML = `
            <div class="result-area">
                <div class="result-header ${passed ? 'result-pass' : 'result-fail'}">${icon}</div>
                <div class="result-items">${items}</div>
                ${exp}${model}
            </div>
        `;
        area.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    },

    highlightChoices(data, selected) {
        const correct = (data.results?.[0]?.msg || '').match(/選択肢 ([A-D])/)?.[1];
        document.querySelectorAll('.choice-btn').forEach(btn => {
            btn.onclick = null;
            if (btn.dataset.key === selected && !data.passed) btn.classList.add('wrong');
            if (correct && btn.dataset.key === correct) btn.classList.add('correct');
        });
    },

    toggleHint() {
        const box = document.getElementById('hint-box');
        if (box) box.classList.toggle('show');
    },

    levelBadge(level) {
        const map = { '初級': 'easy', '中級': 'mid', '上級': 'hard' };
        return `<span class="badge badge-${map[level] || 'mid'}">${level}</span>`;
    },

    typeBadge(type) {
        const map = { choice: '選択', text: '記述', coding: 'コード' };
        return `<span class="badge badge-${type}">${map[type] || type}</span>`;
    },

    esc(s) {
        return String(s ?? '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    },
};

document.addEventListener('DOMContentLoaded', () => App.init());
