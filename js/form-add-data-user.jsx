console.log("form-add-data-user.jsx");

class FormAddDataUser extends  React.Component {

    constructor(props){
        super(props);
        this.state = {
            value: 'smiechulek'
        };
    }
    render(){
        return(
            <div>witam jestem niezly pisarz{this.state.value}</div>
        //    dokonczyc formularz i zrobic w koncu relacje baz danych !!! 
        )
    }


}

ReactDOM.render(<FormAddDataUser/>, document.getElementById('formsAddDataUser'));