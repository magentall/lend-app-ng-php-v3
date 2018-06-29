import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router'
import { FormsModule } from '@angular/forms'


import { AppComponent } from './app.component';
import { HelloComponent } from './hello/hello.component';

import { HttpClientModule } from '@angular/common/http'

import { RecordsService } from './records.service';
import { AuthService } from './auth.service';
import { HomeComponent } from './home/home.component';
import { DataComponent } from './data/data.component';
import { LoginComponent } from './login/login.component';
import { AdminComponent } from './admin/admin.component'
import { AuthGuard } from './auth.guard'
import { UserService } from './user.service';
import { LogoutComponent } from './logout/logout.component';
import { DashComponent } from './dash/dash.component';
import { AdherentComponent } from './adherent/adherent.component';
import { PretComponent } from './pret/pret.component';
import { SupmodifComponent } from './supmodif/supmodif.component';
import { JeuComponent } from './jeu/jeu.component'
import { Ng2SearchPipeModule } from 'ng2-search-filter'


@NgModule({
  declarations: [
    AppComponent,
    HelloComponent,
    HomeComponent,
    DataComponent,
    LoginComponent,
    AdminComponent,
    LogoutComponent,
    DashComponent,
    AdherentComponent,
    PretComponent,
    SupmodifComponent,
    JeuComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    Ng2SearchPipeModule,
    RouterModule.forRoot([
      {
        path:'',
        component:HomeComponent
      },
      {
        path:'data',
        component: DataComponent
      },
      {
        path:'login',
        component: LoginComponent
      },
      {
        path:'logout',
        component: LogoutComponent
      },
      {
        path:'admin',
        component: AdminComponent,
        canActivate: [AuthGuard]
      },
      {
        path:'dash87675',
        component: DashComponent,
        canActivate: [AuthGuard]
      }
    ])
  ],
  providers: [RecordsService, AuthService, AuthGuard, UserService],
  bootstrap: [AppComponent]
})
export class AppModule { }
