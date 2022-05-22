import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ClientrentableComponent } from './clientrentable.component';

describe('ClientrentableComponent', () => {
  let component: ClientrentableComponent;
  let fixture: ComponentFixture<ClientrentableComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ClientrentableComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ClientrentableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
