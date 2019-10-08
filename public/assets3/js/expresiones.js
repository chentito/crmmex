/*
 * Listado de expresiones regulares para la validacion de datos de entrda
 * @Autor Carlos Reyes
 * @Fecha Junio 2019
 */

  /*
   * Validacion de un correo electronico
   */
  var correoElectronicoRx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

  /*
   * Valdacion de un RFC
   */
  var rfcRx = /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$/;

  /*
   * Valdacion de un codigo postal
   */
  var cpRx = /^[0-9]{5,6}/;

  /*
   * Valdacion de un numero telefonico
   */
  var noTelefonicoRx = /^[0-9]{10}/;

  /*
   * Valdacion de un RFC
   */
  var rfcRx = /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$/;
