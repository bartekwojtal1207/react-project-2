
class AcceptFormLabel extends  React.Component{

  constructor(props) {
     super(props);
     this.state = {
      colorLabel: "red"
     };
     this.setColor = this.setColor.bind(this);
   }

  setColor(event){
    this.setState({
      colorLabel: "green"
    })
  }

  render(){
    console.log(this.props.colorLabel)
    return (  <span style={{color: this.state.colorLabel}} onClick={this.setColor}> formularz</span>)
  }

}

//
// function StateStore(){
//   this.state= {
//
//   }
// }
//
// const AppState = new StateStore()
//   AppState.state = {
//
//   }


class App extends  React.Component{
  constructor(props) {
     super(props);
     this.state = {
       value: 'Please write an essay about your favorite DOM element.',
       right: false,
       left: false,
       allIn: false
     };
    this.handleChange = this.handleChange.bind(this);
    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleInputChange(event) {
     const target = event.target;
     const value = target.type === 'checkbox' ? target.checked : target.value;
     const name = target.name;

     console.log(target.name + " " + target.checked + " " + target.value)
    //  najwwazniejsze do wypisania name lub value i checkec !!!


      if (target.checked) {
        this.setState({
          [name]: true
        })
      }

   }


  handleChange(event) {
    this.setState({value: event.target.value});
    // alert('A name was submitted: ' + this.state.value);
}

  handleSubmit(event) {
    alert('A name was submitted: ' + this.state.value);
    event.preventDefault();
  }


  render() {
    return (
    <div>
      <form  action="add_player.php" className="add_player_form register_form" method="post" onSubmit={this.handleSubmit}>
        <div className="form-group">
          <label htmlFor="name_player" >Imię : </label>
            <input type="text" name="name_player" id="name_input" value={this.state.name_player} onChange={this.handleChange} placeholder="Podaj imię gracza" required/>
        </div>
        <div className="form-group">
          <label htmlFor="surname_input"> Nazwisko : </label>
            <input type="text" name="surname_player" id="surname_input" value={this.state.surname_player} onChange={this.handleChange}  placeholder="Podaj nazwisko gracza" required/>
        </div>
        <div className="form-group">
          <label htmlFor="date_input">Data urodzenia :  </label>
          <input type="date" name="age"  id="date_input" value={this.handleInputChange.value}  required />
        </div>
        <div className="form-group">
          <label htmlFor="country"> Narodowośc : </label>
            <input type="text" name="country" id="country_input" value={this.state.country} onChange={this.handleChange} placeholder="Podaj kraj pochodzenia" required/>
        </div>
        <div className="form-group">
          <label htmlFor="formation"> Formacja : </label>
            <input type="text" name="formation" id="formation_input" value={this.state.formation} onChange={this.handleChange} placeholder="Wpisz pozycje" required/>
        </div>
        <div className="form-group">
          <label htmlFor="position"> Pozycja : </label>
            <input type="text" name="position" id="formation_input"  value={this.state.position} onChange={this.handleChange} placeholder="Określ pozycje" required/>
        </div>
        <div className="input-group checkbox_div">
          <div className="radio-inline">
            <label><input type="checkbox"  name="right"  value={this.state.right} onChange={this.handleInputChange} />Prawa</label>
          </div>
          <div className="radio-inline">
            <label><input type="checkbox" name="left" value={this.state.left} onChange={this.handleInputChange} />Lewa</label>
          </div>
          <div className="radio-inline">
            <label><input type="checkbox" name="allIn"  value={this.state.allIn} onChange={this.handleInputChange} />ObXnożny</label>
          </div>
          <div className="form-group">
            <label htmlFor="height_input"> Wzrost </label>
              <input type="number" name="height_input" id="height_input" value={this.handleInputChange.value} placeholder="Podaj wzrost (cm) " required/>
          </div>
          <div className="form-group">
            <label htmlFor="weight_input"> Waga </label>
              <input type="number" name="weight_input" id="weight_input" value={this.handleInputChange.value} placeholder="Podaj wagę (kg) " required/>
          </div>
        </div>
        <input type="submit" className="btn btn-primary"  name="add_player_button"  value="Dodaj piłkarza do bazy" />

      </form>
    </div>
    )
  }

}

ReactDOM.render(<App/>, document.getElementById('test_div'));
console.log("dist/app.js");
