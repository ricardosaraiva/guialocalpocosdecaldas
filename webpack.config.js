'use strict'
const webpack = require('webpack')
const path = require('path')

module.exports = {
  entry: path.join(__dirname, 'resources', 'assets', 'app'),
  module: {
  rules: [
    {
      test: /\.js|.jsx$/,
      exclude: /node_modules/,
      use: {
        loader: 'babel-loader'

      }
    }
  ]
},
plugins: [
  new webpack.ProvidePlugin({
    "React": "react",
  }),
],
  output: {
    path: path.join(__dirname, 'public', 'assets', 'js'),
    filename: 'bundle.js',
    publicPath: path.join(__dirname, 'public', 'static', 'js')
  }
}
