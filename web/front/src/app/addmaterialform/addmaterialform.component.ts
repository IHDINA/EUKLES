import {ChangeDetectorRef, Component, OnInit, ViewChild} from '@angular/core';
import {EuklesService} from "../eukles.service";
import {FormBuilder, FormControl, FormControlName, FormGroup, NgForm, Validators,} from "@angular/forms";

@Component({
  selector: 'app-addmaterialform',
  templateUrl: './addmaterialform.component.html',
  styleUrls: ['./addmaterialform.component.css']
})
export class AddmaterialformComponent implements OnInit {

  public list_all_clients = [];
  public list_all_materials = [];
  public selectedItemClient: any;
  public selectedItemMateriel: any;
  public priceRegex ="\^([\\d]{0,9})(\\.|$)([\\d]{2,2}|)";
  public quantityRegex ="^[1-9][0-9]*$";
  createMatForm: FormGroup;
  createLienForm: FormGroup;
  dataRefresher: any;

  constructor(private euklesService: EuklesService, private fb: FormBuilder, private ref: ChangeDetectorRef) {
  }

  ngOnInit(): void {
    this.getClientsRecords();
    this.getMaterielsRecords();
    this.createMatForm = new FormGroup ({
      materielData: new FormGroup ({
        'pricName': new FormControl('', [Validators.required, Validators.pattern(this.priceRegex)]),
        'materielName': new FormControl('', [Validators.required]),
      }),
    })
    this.createLienForm = new FormGroup ({
      lienData: new FormGroup ({
        'clientListName': new FormControl('', Validators.required),
        'materielListName': new FormControl('', [Validators.required]),
        'quantityName': new FormControl('', [Validators.required, Validators.pattern(this.quantityRegex)]),
      }),
    })
  }

  /**
   * Get All cliens
   */
  getClientsRecords() {
    this.euklesService.getAllClients().subscribe(
      data => {
        this.list_all_clients = data;
        return this.list_all_clients;
      }
    );
  }

  /**
   * Get all materiels
   */
  getMaterielsRecords() {
    this.euklesService.getAllMaterials().subscribe(
      data => {
        this.list_all_materials = data;
        this.ref.detectChanges();
        return this.list_all_materials;
      }
    );
  }

  @ViewChild('f') lienForm: NgForm;

  /**
   * Refresh inputs after insert
   */
  reset() {
    this.lienForm.reset({
      "select-material": "",
      "price": "",
      "select-client": "",
    })
  }

  /**
   * Submit new lien data
   */
  onSubmit(formValues) {
    this.euklesService.saveJunctionTableLien(formValues).subscribe(response => {
    });
    this.reset();
  }

  /**
   * Submit new mat data
   */
  createMat(formValues) {
    this.euklesService.saveNewMat(formValues).subscribe(response => {
    });
    this.resetMatForm();
  }

  @ViewChild('form') matForm: NgForm;

  /**
   * Refresh inputs after insert
   */
  resetMatForm() {
    this.matForm.reset({
      "matname": "",
      "price": "",
    })
  }

}
