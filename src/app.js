'use strict'
var React = require('react')
var ReactDOM = require('react-dom')


let Title = require('./components/title')

ReactDOM.render(
    React.createElement(Title), 
    document.querySelector('[data-js="app"]')
)