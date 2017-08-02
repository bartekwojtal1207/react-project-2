var jsonData = require('table_player.json');
requirejs(["js/table_player.json"], function(util) {
    //This function is called when scripts/helper/util.js is loaded.
    //If util.js calls define(), then this function is not fired until
    //util's dependencies have loaded, and the util argument will hold
    //the module value for "helper/util".
});
class Blah extends React.Component {

render(){
    var data;

    function loadJSON(jsonfile, callback) {

        var jsonObj = new XMLHttpRequest();
        jsonObj.overrideMimeType("application/json");
        jsonObj.open('GET', "../../file.json", true);
        jsonObj.onreadystatechange = function () {
              if (jsonObj.readyState == 4 && jsonObj.status == "200") {
                callback(jsonObj.responseText);
              }
        };
        jsonObj.send(null);
     }

    function load() {

        loadJSON(jsonData, function(response) {
            data = JSON.parse(response);
            console.log(data);
        });
    }

    load();
}

}
class ListPlayer extends React.Component{

  constructor(props) {
     super(props)
     this.state = {

     }
   }

  render(){
    return(
      <span>
        O to lista twoich piłkarzy :
      </span>
    )
  }
}

ReactDOM.render(<Blah/>, document.getElementById('list_player_div'));
console.log("js/list_player.jsx");
