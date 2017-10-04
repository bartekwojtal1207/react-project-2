
console.log("react-profile.jsx");


var newDiv = (
    <div>
        <h1 className="foo">Witam w react</h1>
        <p>Twój profil</p>
        <div>
            <p>imie uzytkownika: </p>
            <p>nazwisko uzytkownika: </p>
            <img src="#" alt="twoje foto"/>
        </div>
        <div>
            <p>dostepne kluby</p>
        </div>
    </div>
);


ReactDOM.render(newDiv,document.getElementById('profile-app'));
