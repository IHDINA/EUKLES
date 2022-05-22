import { Injectable } from '@angular/core';
import {Observable, throwError} from "rxjs";
import {HttpClient} from "@angular/common/http";
import {catchError} from "rxjs/operators";

@Injectable({
  providedIn: 'root',
})
export class EuklesService {

  constructor(private http : HttpClient) { }

  /** Base URL */
  private URL_BASE_LIST_MATERIAL_BY_PRICE = 'http://localhost:80/admin/materiels/list-materiel';
  private URL_BASE_LIST_CLIENTS = 'http://localhost:80/admin/clients/list-all-clients';
  private URL_BASE_LIST_MATERIALS = 'http://localhost:80/admin/materiels/list-all-materiel';
  private URL_BASE_ADD_TO_JUNCTION = 'http://localhost:80/admin/liens/add-new-record';
  private URL_BASE_ADD_NEW_MAT = 'http://localhost:80/admin/materiels/add-new-mat';
  private URL_BASE_LIST_RENTABLE = 'http://localhost:80/admin/clients/rentable-client';

  /**
   * Returns list of records based on price and quantity
   */
  getRecordsByPriceAndQuantity(): Observable<any[]> {
    return this.http.get<any[]>(
      this.URL_BASE_LIST_MATERIAL_BY_PRICE,
    ).pipe(
      catchError(err => {
        return throwError(err);
      })
    );
  }

  /**
   * Returns list of all clients
   */
  getAllClients(): Observable<any[]> {
    return this.http.get<any[]>(
      this.URL_BASE_LIST_CLIENTS,
    ).pipe(
      catchError(err => {
        return throwError(err);
      })
    );
  }

  /**
   * get All materiels
   */
  getAllMaterials(): Observable<any[]> {
    return this.http.get<any[]>(
      this.URL_BASE_LIST_MATERIALS,
    ).pipe(
      catchError(err => {
        return throwError(err);
      })
    );
  }

  /**
   * save new record to DB
   */
  saveJunctionTableLien(data) : Observable<any> {
    return this.http.post(this.URL_BASE_ADD_TO_JUNCTION ,data).pipe(
      catchError(err => {
        console.log(err);
        return throwError(err);
      })
    );
  }

  /**
   * save new materiel record to DB
   */
  saveNewMat(data) : Observable<any> {
    return this.http.post(this.URL_BASE_ADD_NEW_MAT ,data).pipe(
      catchError(err => {
        return throwError(err);
      })
    );
  }

  /**
   * Returns list of records based on price and quantity
   */
  getRecordsRentableClients(): Observable<any[]> {
    return this.http.get<any[]>(
      this.URL_BASE_LIST_RENTABLE,
    ).pipe(
      catchError(err => {
        return throwError(err);
      })
    );
  }
}
