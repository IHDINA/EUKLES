import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { RoutingModule } from './routing.module';
import { ListmaterialComponent } from './listmaterial/listmaterial.component';
import { AddmaterialformComponent } from './addmaterialform/addmaterialform.component';
import { ClientrentableComponent } from './clientrentable/clientrentable.component';
import {HttpClientModule} from "@angular/common/http";
import { NavbarComponent } from './navbar/navbar.component';
import {FormGroup, FormsModule, ReactiveFormsModule} from "@angular/forms";

@NgModule({
  declarations: [
    AppComponent,
    ListmaterialComponent,
    AddmaterialformComponent,
    ClientrentableComponent,
    NavbarComponent,
  ],
  imports: [
    BrowserModule,
    RoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
