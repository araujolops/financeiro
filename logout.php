<?php

/*
 *  Created on : 18 de ago. de 2022, 11:58:49
 *  Author     : Alexandre
 *  Description: Fazer o logout do sistema.
 * @copyright (c) 2022, Alexandre - Ensist Sistemas
 */

@session_start();
@session_destroy();
echo "<script>window.location=' index.php'</script>";
