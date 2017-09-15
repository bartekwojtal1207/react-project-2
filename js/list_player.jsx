
console.log(data.player_name);

class ListPlayer extends React.Component{

  constructor(props) {
     super(props);
     this.state = {

     }
   }

  render(){
    return(
      <div>
        <span>
          O to lista twoich piłkarzy :
        </span>
        <div>
          <ul>{li_player}</ul>
        </div>
      </div>
    )
  }
}
var list_name = data.player_name;

console.log(list_name);
const li_player = Object.keys(list_name).map((key) =>
     <li key={key}> {list_name[key]}  </li>
);

ReactDOM.render(<ListPlayer />, document.getElementById('list_player_div'));
console.log("js/list_player.jsx");
