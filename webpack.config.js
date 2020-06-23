var webpack = require("webpack");

module.exports = {
    module: {
        rules: [
            { test: /datatables\.net.*/, loader: 'imports-loader?define=>false' },
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            'window.jQuery': 'jquery',
            'window.$': 'jquery'
        })
    ]
};