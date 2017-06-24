new TWTR.Widget({
    version: 2,
    type: 'profile',
    rpp: 1,
    interval: 5000,
    width: 700,
    height: 20,
    theme: {
        shell: {
            background: 'transparent',
            color: '#000'
        },
        tweets: {
            background: 'transparent',
            color: '#333',
            links: '#999'
        }
    },
    features: {
        scrollbar: false,
        loop: true,
        live: true,
        behavior: 'all'
    }
}).render().setUser('cidesa').start();


