import { Component, OnInit } from '@angular/core';
import {EuklesService} from "../eukles.service";

@Component({
  selector: 'app-clientrentable',
  templateUrl: './clientrentable.component.html',
  styleUrls: ['./clientrentable.component.css']
})
export class ClientrentableComponent implements OnInit {

  private list_rentabl_client = [];
  private client_rentable;

  constructor(private euklesService: EuklesService) { }

  ngOnInit(): void {
    this.getRentableClientRecords();
  }

  /**
   * Returns list of records for rentable clients
   */
  getRentableClientRecords() {
    this.euklesService.getRecordsRentableClients().subscribe(
      data => {
        this.list_rentabl_client = data;
        const result =  this.list_rentabl_client.reduce((prev, current) => (+prev.totaux > +current.totaux) ? prev : current)
        this.client_rentable = result.nomClient;
        return this.list_rentabl_client;
      }
    );
  }
}
