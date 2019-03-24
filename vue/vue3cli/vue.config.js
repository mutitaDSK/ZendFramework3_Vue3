const path = require('path');
const webpack = require('webpack');

module.exports = {
  configureWebpack: {
    resolve: {
      extensions: ['.js'],
      alias: {
        'jquery': 'jquery/dist/jquery.slim.js',
        'bootstrap-components': path.resolve(__dirname, 'node_modules/bootstrap-vue/es/components'),
      }
    },
    plugins: [
      new webpack.ProvidePlugin({
        '$': 'jquery',
        jQuery: 'jquery',
        Popper: ['popper.js', 'default'],
        'Util': "exports-loader?Util!bootstrap/js/dist/util"
      }),
      // new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
    ]
  }
};

