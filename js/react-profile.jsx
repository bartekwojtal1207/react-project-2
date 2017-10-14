
console.log("react-profile.jsx");


class NewDiv extends React.Component {


    constructor(props) {

        super(props);

        this.state = {

        }

    }

    render() {

        return (
            <div>
                <h1 className="foo">Witam w react</h1>
                <p >Twój profil</p>
                <div>
                    <p>imie uzytkownika: </p>
                    <p>nazwisko uzytkownika: </p>
                    <img src="#" alt="twoje foto"/>
                </div>
                <div>
                    <p>dostepne kluby</p>
                </div>
            </div>
        )
    }

}


ReactDOM.render(< NewDiv name="bartek" />, document.getElementById('profile-app'));

