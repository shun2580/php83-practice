<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP 8.3 練習問題集</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="layout">

  <!-- サイドバー -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <h1>PHP 8.3 練習問題</h1>
    </div>

    <div class="sidebar-search">
      <input type="text" class="search-input" id="search-input" placeholder="問題を検索...">
    </div>

    <div class="sidebar-filters">
      <div>
        <label>レベル</label>
        <select class="filter-select" id="filter-level"></select>
      </div>
      <div>
        <label>ジャンル</label>
        <select class="filter-select" id="filter-genre"></select>
      </div>
      <div>
        <label>種類</label>
        <select class="filter-select" id="filter-type"></select>
      </div>
    </div>

    <div class="progress-bar">
      <div class="progress-fill" id="progress-fill" style="width:0%"></div>
    </div>
    <div class="progress-label" id="progress-label">正解 0 / 0</div>

    <div class="problem-list" id="problem-list">
      <p class="loading">読み込み中...</p>
    </div>
  </aside>

  <!-- メインコンテンツ -->
  <main class="main" id="main-content">
    <div class="empty">
      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
        <rect x="9" y="3" width="6" height="4" rx="1"/>
        <line x1="9" y1="12" x2="15" y2="12"/>
        <line x1="9" y1="16" x2="13" y2="16"/>
      </svg>
      <p>左のリストから問題を選んでください</p>
    </div>
  </main>

</div>
<script src="/js/app.js"></script>
</body>
</html>
