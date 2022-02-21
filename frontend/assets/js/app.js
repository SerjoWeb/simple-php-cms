;((window) => {
    'use strict';

    class App {
        constructor(window) {
            const global = window;
        }

        Init() {
            console.info('App is ready');

            this.showActualContent();
        }

        getCookie(cookieName) {
            const name = `${cookieName}=`;
            const decodedCookie = decodeURIComponent(document.cookie).split(';');
            
            for(let i = 0; i < decodedCookie.length; i++) {
                let cookie = decodedCookie[i];
            
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
            
                if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }

            return false;
        }

        showAuth() {
            document.getElementById('auth').style.display = 'block';
            document.getElementById('auth').style.visibility = 'visible';
            document.getElementById('auth').style.opacity = 1;
        }

        showDasboard() {
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('dashboard').style.visibility = 'visible';
            document.getElementById('dashboard').style.opacity = 1;
        }

        showActualContent() {
            const ifAuth = this.getCookie('auth');

            if (ifAuth && ifAuth !== '') {
                this.showAuth();
            } else {
                this.showDasboard();
                this.autoSizeOfDashboardParts();
                this.initDasboardTab();
                this.toggleTabs();
            }
        }

        autoSizeOfDashboardParts() {
            const dashboardHeader = document.getElementById('dashboard-header');
            const dashboardPane   = document.getElementById('dashboard-pane');

            dashboardPane.style.height = `calc(100vh - ${dashboardHeader.offsetHeight}px)`;
        }

        initDasboardTab() {
            document.getElementById('tab-dashboard').style.display = 'block';
            document.getElementById('tab-dashboard').style.visibility = 'visible';
            document.getElementById('tab-dashboard').style.opacity = 1;
        }

        toggleTabs() {
            document.addEventListener('click', e => {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                Array.from(document.getElementsByClassName('sidebar-nav-item')).forEach(element => {
                    if (element.classList.contains('active')) {
                        element.classList.remove('active');
                    }
                });

                if (e.target.nodeName.toLowerCase() === 'a' && e.target.parentNode.nodeName.toLowerCase() === 'li') {
                    e.target.classList.add('active');

                    Array.from(document.getElementsByClassName('tab-content')).forEach(element => {
                        element.style.display = 'none';
                        element.style.visibility = 'hidden';
                        element.style.opacity = 0;
                    });

                    document.getElementById(e.target.getAttribute('href')).style.display = 'block';
                    document.getElementById(e.target.getAttribute('href')).style.visibility = 'visible';
                    document.getElementById(e.target.getAttribute('href')).style.opacity = 1;
                }

                return;
            });
        }
    };

    document.addEventListener('DOMContentLoaded', (event) => {
        const APP = new App(window);
              APP.Init();
    });
})(window);