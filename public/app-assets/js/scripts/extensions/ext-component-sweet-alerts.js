/*=========================================================================================
	File Name: ext-component-sweet-alerts.js
	Description: A beautiful replacement for javascript alerts
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict';

  var positionTopEndSubmitUser = $('#positionTopEndSubmitUser');
  var positionTopEndSubmitRegion = $('#positionTopEndSubmitRegion');
  var positionTopEndSubmitVaccineIOC = $('#positionTopEndSubmitVaccineIOC');
  var positionTopEndSubmitVaccineSite = $('#positionTopEndSubmitVaccineSite');

  var positionTopEndEditRegion = $('#positionTopEndEditRegion');
  var positionTopEndEditUser = $('#positionTopEndEditUser');
  var positionTopEndEditVaccineSite = $('#positionTopEndEditVaccineSite');

  // For Vaccine Site Edit
  if (positionTopEndEditVaccineSite.length) {
    positionTopEndEditVaccineSite.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'User data Successfully Updated',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // For User Edit
  if (positionTopEndEditUser.length) {
    positionTopEndEditUser.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'User data Successfully Updated',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // For Region Edit
  if (positionTopEndEditRegion.length) {
    positionTopEndEditRegion.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Region data Successfully Updated',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // For Use Add
  if (positionTopEndSubmitUser.length) {
    positionTopEndSubmitUser.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'New User is created Successfully',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

   // For Region Add
   if (positionTopEndSubmitRegion.length) {
    positionTopEndSubmitRegion.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'New Region is added Successfully',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

  // For Vaccine-IOC Add
  if (positionTopEndSubmitVaccineIOC.length) {
    positionTopEndSubmitVaccineIOC.on('click', function () {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'New file uploaded Successfully',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
    });
  }

    // For Vaccine-Site Add
    if (positionTopEndSubmitVaccineSite.length) {
      positionTopEndSubmitVaccineSite.on('click', function () {
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'New Vaccine Site added Successfully',
          showConfirmButton: false,
          timer: 1500,
          customClass: {
            confirmButton: 'btn btn-primary'
          },
          buttonsStyling: false
        });
      });
    }

});
