import './SignInForm'
import './SignInForm.css'


const SignInForm= ()=>{

return(
    <div className="LoginContainer">
        <h1>Connexion</h1>
        <form>
        <input placeholder="Email" type="email" name="email" />
        <input placeholder="Mot de passe" name="password"></input>
        <input type="submit"  value="Se connecter"></input>
       </form>
      <p>
        Vous avez pas un compte?
      <Link className="lien" to='/SignUpForm'> Inscrivez-vous</Link>
    </p>
    </div>

);



};

export default SignInForm;