import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service'
import { Router } from '@angular/router'

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.sass']
})
export class LoginComponent implements OnInit {

  constructor(private Auth: AuthService, private router: Router) { }

  ngOnInit() {
  }

  loginUser(event){


    const coef = '5BY**246f6b36f6b87jH'



    event.preventDefault()
    const target = event.target
    const username = target.querySelector('#username').value
    var passwordd = target.querySelector('#password').value
    const capt = target.querySelector('#capt').value

    var hexa = '';

    var charz ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"



    for(var i=0;i<passwordd.length;i++) {
      hexa += passwordd.charCodeAt(i).toString(16)
      //hexa += 'ab'
    }

    hexa += coef
    var psd = ''
    for(i=0;i<hexa.length;i++){

      var a = charz.substr(Math.floor(Math.random()*62),1)
      psd+=a
      a = charz.substr(Math.floor(Math.random()*62),1)
      psd+=a
      psd+=hexa[i]

    }

    const password = psd //hexa

    //console.log(psd)

    //console.log(password,username);



    if (capt==='b'){

      this.Auth.getUserDetails(username, password).subscribe(data => {
        if(data.success){
          // redir to /admin
          if(username=="supuz"){
            this.router.navigate(['dash87675'])
            this.Auth.setLoggedIn(true)
          }
          else{
            this.router.navigate(['admin'])
            this.Auth.setLoggedIn(true)
          }
        } else {
        window.alert(data.message)
      }
      })
    }
    else{
      window.alert('la réponse est b')
    }

    //console.log(username, password)
  }

}
