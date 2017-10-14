class FormAddDataUser extends  React.Component {

    constructor(props){

        super(props);

        this.state = {
            name_user: '',
            surname_user: '',
            numberPhone: 0,
            description_submit: 'uzupelnij swoje dane osobowe'
        };

        this.handleChangeInput = this.handleChangeInput.bind(this);
        this.pressButton = this.pressButton.bind(this);
    }

    pressButton(event){
        console.log('kliknieto przycisk w formularzu dodoaj dane ');
        alert(this.state.name_user + this.state.surname_user);
        // event.preventDefault();
    }

    handleChangeInput(event) {

        const x = event.target.attributes.getNamedItem('data-function').value; // zmienic nazwe zmiennej

        if(x === '0') {
            this.setState({name_user: event.target.value});
            console.log(this.state.name_user)// dostosowac do reszty inputow
        }else if(x === '1') {
            this.setState({surname_user: event.target.value});
        }else if(x === '2'){
            this.setState({numberPhone: event.target.value});
        }

    }

    render(){
        return(
            <div>
                <div>
                    <div>witam jestem niezly pisarz{this.state.value}</div>
                     <form  action="set-data-user.php" className="data_user_form register_form2" method="post" onSubmit={this.pressButton}>
                         <div className="form-group">
                         <label htmlFor="name_data_user" >Imię : </label>
                             <input type="text" name="name_data_user"  data-function="0" value={this.state.name_user} onChange={this.handleChangeInput} placeholder="Podaj swoje imie" />
                         </div>
                         <div className="form-group">
                         <label htmlFor="surname_data_user" >nazwisko : </label>
                             <input type="text" name="surname_data_user" data-function="1" value={this.state.value2} onChange={this.handleChangeInput} placeholder="Podaj swoje nazwisko" required/>
                         </div>
                         <div className="form-group">
                             <label htmlFor="number-user" > nr telefonu :  </label>
                             <input type="number" name="number-user" data-function="2" value={this.state.numberPhone} onChange={this.handleChangeInput} placeholder="wpisz swoj nr fona" required/>
                         </div>
                         <div className="form-group">
                             <label htmlFor="add_photo_user"> Dodaj swoje zdjecie</label>
                             <input type="file" name="add_photo_user"/>
                         </div>
                         <input type="submit" className="btn btn-primary"  name="add_data_user_button"  value={this.state.description_submit} />
                     </form>
                </div>
            </div>
        )
    }
}

ReactDOM.render(<FormAddDataUser/>, document.getElementById('formsAddDataUser'));