// var React = require('react');
// var ReactDOM = require('react-dom');




class NameForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {

    };
    // this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleInputChange = this.handleInputChange.bind(this);
  }
  handleInputChange(event) {
     const target = event.target;
     const value = target.type === 'checkbox' ? target.checked : target.value;
     const name = target.name;

     this.setState({
        [name]: value,
      //  value: event.target.value
     });
   }

  handleChange(event) {
    this.setState({value: event.target.value});
    alert('A name was submitted: ' + this.state.value);
  }

  handleSubmit(event) {
    alert('A name was submitted: ' + this.state.name);
    event.preventDefault();
  }
// onSubmit={this.handleSubmit}
  render() {
    return (
      <form  action="add_player.php" className="add_player_form register_form" method="post">
        <div className="form-group">
          <label htmlFor="name_player" >Imię : </label>
            <input type="text" name="name_player" id="name_input" value={this.state.value} placeholder="Podaj imię gracza" required/>
        </div>
        <div className="form-group">
          <label htmlFor="surname_input"> Nazwisko : </label>
            <input type="text" name="surname_player" id="surname_input" value={this.state.value}  placeholder="Podaj nazwisko gracza" required/>
        </div>
        <div className="form-group">
          <label htmlFor="date_input">Data urodzenia :  </label>
          <input type="date" name="age"  id="date_input" value={this.state.value}  required />
        </div>
        <div className="form-group">
          <label htmlFor="country"> Narodowośc : </label>
            <input type="text" name="country" id="country_input" value={this.state.value} placeholder="Podaj kraj pochodzenia" required/>
        </div>
        <div className="form-group">
          <label htmlFor="formation"> Formacja : </label>
            <input type="text" name="formation" id="formation_input" value={this.state.value} placeholder="Wpisz pozycje" required/>
        </div>
        <div className="form-group">
          <label htmlFor="position"> Pozycja : </label>
            <input type="text" name="position" id="formation_input" value={this.state.value}  placeholder="Określ pozycje" required/>
        </div>
        <div className="input-group checkbox_div">
          <div className="radio-inline">
            <label><input type="checkbox"  value="prawa" name="betterfoot" />Prawa</label>
          </div>
          <div className="radio-inline">
            <label><input type="checkbox" value="lewa" name="betterfoot"/>Lewa</label>
          </div>
          <div className="radio-inline">
            <label><input type="checkbox" name="betterfoot" value="ObXnożny" />ObXnożny</label>
          </div>
          <div className="form-group">
            <label htmlFor="height_input"> Wzrost </label>
              <input type="number" name="height_input" id="height_input" value={this.state.value} placeholder="Podaj wzrost (cm) " required/>
          </div>
          <div className="form-group">
            <label htmlFor="weight_input"> Waga </label>
              <input type="number" name="weight_input" id="weight_input" value={this.state.value} placeholder="Podaj wagę (kg) " required/>
          </div>
        </div>
        <input type="submit" className="btn btn-primary"  name="add_player_button"  value="Dodaj piłkarza do bazy" />
      </form>
    );
  }
}


ReactDOM.render(<NameForm/>, document.getElementById('test_div'));
