window.onload = function () {

    /* Check if browser support CSS variables */
    function testCSSVariables() {
        var color = 'rgb(255, 198, 0)';
        var el = document.createElement('span');

        el.style.setProperty('--color', color);
        el.style.setProperty('background', 'var(--color)');
        document.body.appendChild(el);

        var styles = getComputedStyle(el);
        var doesSupport = styles.backgroundColor === color;
        document.body.removeChild(el);
        return doesSupport;
    }

    if (!testCSSVariables()) {
        document.body.innerHTML = (
            "<div class=\"ie-support\">\n" +
            "    <p class='ie'>\n" +
            "        The browser you are using is not supported.</p>\n" +
            "    <p>Try one of them <a class='iered' href='https://www.google.com/chrome/browser/desktop/index.html'>Google\n" +
            "        Chrome</a>,\n" +
            "        <a class='iered' href='https://www.mozilla.org/en-US/firefox/new/'>Mozilla Firefox</a>,\n" +
            "        <a class='iered' href='http://www.opera.com/download'>Opera</a>\n" +
            "    </p>\n" +
            "</div>"
        );
    }

};

