import { Component, OnInit } from '@angular/core';
import { RecordsService } from '../records.service'
import { UserService } from '../user.service'
//import { Subject } from 'rxjs/Subject'


@Component({
  selector: 'app-data',
  templateUrl: './data.component.html',
  styleUrls: ['./data.component.sass']
})

export class DataComponent implements OnInit {

  rec = []
  tabcat = []
  /*dtOptions: DataTables.Settings={};
  dtTrigger: Subject<any> = new Subject();*/

  constructor(private myFirstService : RecordsService,private user: UserService) { }

  ngOnInit() {
/*
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLenght: 10
    }
*/
    this.myFirstService.getData().subscribe(data =>{
          this.rec = data.obj
          //this.dtTrigger.next()
        })

    this.user.getListCat().subscribe(data2 => {
          this.tabcat = data2.obj
          if(!data2.success){
            localStorage.removeItem('loggedIn')
          }
        })

  }
}
