import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {RouterModule, Routes} from "@angular/router";
import {ListmaterialComponent} from "./listmaterial/listmaterial.component";
import {AddmaterialformComponent} from "./addmaterialform/addmaterialform.component";
import {ClientrentableComponent} from "./clientrentable/clientrentable.component";


const routerConfig: Routes = [
  {
    path: 'material-list',
    component: ListmaterialComponent
  },
  {
    path: 'add-new-materials',
    component: AddmaterialformComponent
  },
  {
    path: 'rentable-clients',
    component: ClientrentableComponent
  },
  {
    path: '',
    redirectTo: '/material-list',
    pathMatch: 'full'
  },
  {
    path: '**',
    redirectTo: '/material-list',
    pathMatch: 'full'
  }
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(routerConfig)
  ],
  exports: [
    RouterModule
  ]
})
export class RoutingModule { }
