import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddmaterialformComponent } from './addmaterialform.component';

describe('AddmaterialformComponent', () => {
  let component: AddmaterialformComponent;
  let fixture: ComponentFixture<AddmaterialformComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddmaterialformComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AddmaterialformComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
