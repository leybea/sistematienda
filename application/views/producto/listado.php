<table class="table table-border table-striped table-hover">
    <thead>
        <tr>
          <th>N</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=0;
            foreach($Productos->result() as $fila){
                $i++;
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$fila->nombre;?></td>
            <td><?=$fila->precio;?></td>
            <td><?=$fila->detalle;?></td>
            <td> <img src="<?=base_url();?>imagenes/productos/<?=$fila->foto;?>" width="50" class="img-thumbnail"></td>
            

        </tr>
        <?php } ?>
    </tbody>
        



</table>