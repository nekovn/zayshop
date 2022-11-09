class TFooter {
    /**
     * 画面処理ID
     */
    #functionId;

    /**
     * 1ページは何行を表示する
     */
    #per_page
    constructor(functionId, per_page) {
        this.#functionId = functionId;
        this.#per_page = per_page;

        this.setLinkBtn(this.#per_page);
    }

    /**
     * Prev,Nextボタンにper_pageパラメータを追加する
     * @param per_page
     */
    setLinkBtn = (per_page) => {
        const paginationPrev = document.getElementById("paginationPrev");
        const paginationNext = document.getElementById("paginationNext");
        [paginationPrev, paginationNext].forEach((btn) => {
            if (btn) {
                const prevLink = btn.getAttribute('href')+per_page;
                btn.setAttribute('href', prevLink);
            }
        })

    }

}

export {TFooter};
