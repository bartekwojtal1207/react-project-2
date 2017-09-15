
class FormTeamRegister extends  React.Component{
    render(){
        return(

            <div>
                <div>
                    <h3 className="foo">Dodaj swoja druzyne</h3>
                </div>
                <div className="register-team input-group input-group-sm">
                    <form action="update-register-team.php" method="post">
                        <div className="form-group">
                            <label htmlFor="team_name" >Wpisz nazwę drużyny : </label> <br/>
                            <input type="text" placeholder="Wpisz nazwę druzyny" name="team_name" /*value={this.state.name_player}  onChange={this.handleChange}*/ required/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="team_name" >Rok założenia :</label> <br/>
                            <input type="date" placeholder="Wpisz rok założenia  druzyny" name="year_team_create" /*value={this.state.name_player}  onChange={this.handleChange}*/ required/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="team_name" >NIP :</label> <br/>
                            <input type="number" placeholder="Podaj NIP drużyny" name="team_NIP" /*value={this.state.name_player}  onChange={this.handleChange}*/ required/>
                        </div>
                        <input type="submit" className="btn btn-primary"  name="add_team_button"  value="Dodaj drużynę" />
                    </form>

                </div>
            </div>

        )
    }
}
class Demo extends React.Component {
    render(){
        return(
            <div>

            </div>
        )
    }
}
ReactDOM.render(<FormTeamRegister /> ,document.getElementById('newapp-update-page'));
ReactDOM.render(<Demo /> ,document.getElementById('newapp-update-page2'));