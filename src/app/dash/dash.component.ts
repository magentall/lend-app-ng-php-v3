import { Component, OnInit } from '@angular/core';
import { UserService } from '../user.service'

@Component({
  selector: 'app-dash',
  templateUrl: './dash.component.html',
  styleUrls: ['./dash.component.sass']
})
export class DashComponent implements OnInit {

  tabprets = []
  total = 0;

  constructor(private user: UserService) { }

  ngOnInit() {
    const date_start = ''
    const date_end = ''

    this.user.getListPrets(date_start,date_end).subscribe(data2 => {
      this.tabprets = data2.obj
      //console.log(this.tabprets[0].prix)

      for (var i = 0; i < this.tabprets.length; i++) {
          var element = this.tabprets[i]
          //console.log(element.prix)
          // how to add each price and get a total
          var parse = parseFloat(element.prix)
          this.total += parse
        }
        //console.log(this.total)
      if(!data2.success){
        localStorage.removeItem('loggedIn')
      }
    })

  }

  affprets(event){
    event.preventDefault()
    const target = event.target

    const date_start = target.querySelector('#date_start').value
    const date_end = target.querySelector('#date_end').value



    this.user.getListPrets(date_start,date_end).subscribe(data1 => {
      this.tabprets = data1.obj
      this.total = 0;
      for (var i = 0; i < this.tabprets.length; i++) {
          var element = this.tabprets[i]
          //console.log(element.prix)
          // how to add each price and get a total
          var parse = parseFloat(element.prix)
          this.total += parse
        }

      })


  }


}
