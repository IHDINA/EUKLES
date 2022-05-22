import { Component, OnInit } from '@angular/core';
import { EuklesService } from "../eukles.service";

@Component({
  selector: 'app-listmaterial',
  templateUrl: './listmaterial.component.html',
  styleUrls: ['./listmaterial.component.css']
})
export class ListmaterialComponent implements OnInit {

  private list_meterials = [];

  constructor(private euklesService: EuklesService) {}
  ngOnInit(): void {
   this.getMaterialRecords();
  }

  getMaterialRecords() {
    this.euklesService.getRecordsByPriceAndQuantity().subscribe(
      data => {
        this.list_meterials = data;
        return this.list_meterials;
      }
    );
  }
}
