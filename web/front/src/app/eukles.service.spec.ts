import { TestBed } from '@angular/core/testing';

import { EuklesService } from './eukles.service';

describe('EuklesService', () => {
  let service: EuklesService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EuklesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
