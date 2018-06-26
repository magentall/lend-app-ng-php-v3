import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-supmodif',
  templateUrl: './supmodif.component.html',
  styleUrls: ['./supmodif.component.sass']
})
export class SupmodifComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  addpsd(event){
    event.preventDefault()
    const target = event.target
    const num_adh = target.querySelector('#seladh').value
    const alias = target.querySelector('#alias').value
    const psd = target.querySelector('#passwordadd').value
  }

  alterjeu(event){
    event.preventDefault()
    const target = event.target
    const num_jeu = target.querySelector('#seljeu').value
    const code = target.querySelector('#code').value
  }

}
