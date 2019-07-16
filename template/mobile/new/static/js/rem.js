(function(doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        pW = 750,
        recalc = function() {
            var cW = docEl.clientWidth < 750 ? docEl.clientWidth : 750;
            if (!cW) {
                return;
            }
            docEl.style.cssText = 'font-size:'+20 * (cW / pW) + 'px !important';
        };
    recalc();
    win.addEventListener(resizeEvt, recalc, false);
})(document, window);