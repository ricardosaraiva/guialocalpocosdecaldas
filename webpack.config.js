'use strict'
const webpack = require('webpack');
const path = require('path')

module.exports = {
  entry: path.join(__dirname, 'src', 'app'),
  output: {
    path: path.join(__dirname, 'build', 'js'),
    filename: 'bundle.js',
    publicPath: '/static/'
  }
}
