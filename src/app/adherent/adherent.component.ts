import { Component, OnInit } from '@angular/core';
import { UserService } from '../user.service';


@Component({
  selector: 'app-adherent',
  templateUrl: './adherent.component.html',
  styleUrls: ['./adherent.component.sass']
})
export class AdherentComponent implements OnInit {

  constructor(private User: UserService) { }

  ngOnInit() {
  }

  addad(event){
    event.preventDefault()
    const target = event.target
    const id_adh = target.querySelector('#id_adh').value
    const prenoms_responsables = target.querySelector('#prenoms_responsables').value
    const prenoms_enfants = target.querySelector('#prenoms_enfants').value
    const date_adh = target.querySelector('#date_adh').value
    const type_adh = target.querySelector('#type_adh').value
    const code_postal = target.querySelector('#code_postal').value
    const ville = target.querySelector('#ville').value
    const num_tel = target.querySelector('#num_tel').value
    const num_portable = target.querySelector('#num_portable').value
    const adresse = target.querySelector('#adresse').value
    const alias = target.querySelector('#alias').value
    const pswd = target.querySelector('#passwordadd').value
    const noms_adherent = target.querySelector('#noms_adherent').value
    //console.log(id_adh,prenoms_responsables,prenoms_enfants,date_adh,type_adh,code_postal,ville,num_tel,num_portable,adresse,alias,pswd,noms_adherent)
    this.User.ajoutAdherent(id_adh,prenoms_responsables,prenoms_enfants,date_adh,type_adh,code_postal,ville,num_tel,num_portable,adresse,alias,pswd,noms_adherent).subscribe(data => {

      if(data.success){
        alert(data.message)
        location.reload()
      } else {
      window.alert(data.message)
      }
      })

  }

}
