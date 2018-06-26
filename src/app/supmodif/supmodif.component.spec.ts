import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SupmodifComponent } from './supmodif.component';

describe('SupmodifComponent', () => {
  let component: SupmodifComponent;
  let fixture: ComponentFixture<SupmodifComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SupmodifComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SupmodifComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
