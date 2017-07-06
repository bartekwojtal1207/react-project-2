// var React = require('react');
// var ReactDOM = require('react-dom');
console.log('react.jsx(bez require[na razie])')

// var jsonfile = require('../newfile.JSON');
// console.log(jsonfile);


var newDiv = (
  <div>
    <h1 className="foo">Witam w react</h1>
    <p>wybierz jedną z dostępnych opcji</p>
  </div>
);


ReactDOM.render(newDiv,document.getElementById('newapp'));
