<div id="commandPalette" class="cmdk" hidden aria-hidden="true">
    <div class="cmdk__backdrop" data-cmdk-close></div>
    <div class="cmdk__dialog" role="dialog" aria-modal="true" aria-labelledby="cmdkTitle">
        <div class="cmdk__header">
            <svg class="h-4 w-4 shrink-0 text-gh-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input id="cmdkInput" type="text" class="cmdk__input" placeholder="Search pages, actions…" autocomplete="off" spellcheck="false">
            <kbd class="gh-kbd">Esc</kbd>
        </div>
        <p id="cmdkTitle" class="sr-only">Command palette</p>
        <ul id="cmdkList" class="cmdk__list" role="listbox"></ul>
        <div class="cmdk__footer">
            <span><kbd class="gh-kbd">↑</kbd><kbd class="gh-kbd">↓</kbd> navigate</span>
            <span><kbd class="gh-kbd">↵</kbd> open</span>
        </div>
    </div>
</div>
