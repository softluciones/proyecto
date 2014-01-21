<div class="cheques view">
<h2><?php echo __('Cheque'); ?></h2>
	
<table>
    <tr>
        <th><?php echo __('Banco: '); echo $this->Html->link($cheque['Banco']['codigo'], array('controller' => 'bancos', 'action' => 'view', $cheque['Banco']['id'])); ?></th>
        <th><?php echo __('Cliente: '); echo $this->Html->link($cheque['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cheque['Cliente']['id'])); ?></th>
        <th><?php echo __('Numero de cuenta: '); echo h($cheque['Cheque']['numerodecuenta']); ?></th>
    </tr>
    <tr>
        <th><?php echo __('Numero de cheque: '); echo h($cheque['Cheque']['numerodecheque']); ?></th>        
        <th><?php echo __('Monto: '); echo h($cheque['Cheque']['monto']); ?></th>
         <th><?php echo __('Intereses: '); echo $this->Html->link($cheque['Interese']['rango'], array('controller' => 'interese', 'action' => 'view', $cheque['Interese']['id'])); ?></th>
       
    </tr>
    <tr>
        <th><?php 
        
        $fecha1 = new Datetime($cheque['Cheque']['fecharecibido']);
        $fecha1 = $fecha1->format('d-m-Y');
        echo __('Fecha Recibido: '); echo $fecha1; ?></th>
        <th colspan="2"><?php 
        $fecha2 = new Datetime($cheque['Cheque']['fechacobro']);
        $fecha2 = $fecha2->format('d-m-Y');
        echo __('Fecha de Cobro: '); echo $fecha2;
         ?></th>
    </tr>
    <tr>
        <th colspan="3"><div align="center"><?php echo __('Imagen: '); ?><br><?php echo $this->Html->image('uploads/cheque/filename/'.$cheque['Cheque']['filename'],array('width'=>500,'heigth'=>400)); ?></div></th>
    </tr>
    <tr>
        <th><?php 
        $fecha2 = new Datetime($cheque['Cheque']['modified']);
        $fecha2 = $fecha2->format('d-m-Y');
        echo __('Fecha Modificación: '); echo $fecha2;
         ?></th>
        <th><?php echo __('Dias: '); echo h($cheque['Cheque']['dias']); ?></th>
        <th><?php echo __('Modo cheque: '); if($cheque['Cheque']['cobrado']==1)
                                echo h('Por Cobrar');
                            else
                                if($cheque['Cheque']['cobrado']==2)
                                    echo h('Cobrado');
                                else
                                    echo h('Devuelto'); ?></th>
    </tr>
    <tr>
        <th><?php if($cheque['Cheque']['cheque_id']!=null){ echo __('Cheque a Pagar: '); echo $this->Html->link($cheque['Cheque']['numerodecheque'], array('controller' => 'cheques', 'action' => 'view', $cheque['Cheque']['id'])); } ?></th>
        <th><?php echo __('Usuario: '); echo $this->Html->link($cheque['User']['username'], array('controller' => 'users', 'action' => 'view', $cheque['User']['id'])); ?></th>
        <th></th>
    </tr>
</table>

<div class="related">
	<h3><?php echo __('Pagos con Cheque'); 
        
         ?></h3>
<?php if(!empty($relacionados)): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Nro de Cheque'); ?></th>
		<th><?php echo __('Días'); ?></th>
		<th><?php echo __('Interes'); ?></th>
		<th><?php echo __('Monto'); ?></th>
                 <th><?php echo __('Edo.'); ?></th>
                 <th><?php echo __('Fecha Recib.'); ?></th>
                 <th><?php echo __('Fecha Cobro'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php 
        debug($relacionados);
        foreach ($relacionados as $chequeEstadocheque): ?>
		<tr>
			
			<td><?php echo $chequeEstadocheque['Banco']['nombre']; ?></td>
			<td><?php echo $chequeEstadocheque['Cheque']['numerodecheque']; ?></td>
			<td><?php echo $chequeEstadocheque['Cheque']['dias']; ?></td>
			<td><?php echo $chequeEstadocheque['Interese']['rango']; ?></td>
                        <td><?php echo $chequeEstadocheque['Cheque']['monto']; ?></td>
                        <td><?php echo $chequeEstadocheque['Cheque']['monto']; ?></td>
			<td><?php echo $chequeEstadocheque['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cheque_estadocheques', 'action' => 'view', $chequeEstadocheque['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cheque_estadocheques', 'action' => 'edit', $chequeEstadocheque['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cheque_estadocheques', 'action' => 'delete', $chequeEstadocheque['id']), null, __('Are you sure you want to delete # %s?', $chequeEstadocheque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('action' => 'add2',$cheque['Cheque']['id'])); ?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php echo __('Related Cheque Estadocheques'); ?></h3>
	<?php if (!empty($cheque['ChequeEstadocheque'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Estadocheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cheque['ChequeEstadocheque'] as $chequeEstadocheque): ?>
		<tr>
			<td><?php echo $chequeEstadocheque['id']; ?></td>
			<td><?php echo $chequeEstadocheque['created']; ?></td>
			<td><?php echo $chequeEstadocheque['modified']; ?></td>
			<td><?php echo $chequeEstadocheque['cheque_id']; ?></td>
			<td><?php echo $chequeEstadocheque['estadocheque_id']; ?></td>
			<td><?php echo $chequeEstadocheque['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ChequeEstadocheques', 'action' => 'view', $chequeEstadocheque['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ChequeEstadocheques', 'action' => 'edit', $chequeEstadocheque['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ChequeEstadocheques', 'action' => 'delete', $chequeEstadocheque['id']), null, __('Are you sure you want to delete # %s?', $chequeEstadocheque['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cheque Estadocheque'), array('controller' => 'ChequeEstadocheques', 'action' => 'add',$chequeEstadocheque['cheque_id'])); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Chequeinterese'); ?></h3>
	<?php if (!empty($cheque['Chequeinterese'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Montocheque'); ?></th>
		<th><?php echo __('Montodescuentointeres'); ?></th>
		<th><?php echo __('Montoentregado'); ?></th>
                <th><?php echo __('Estado cheque'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cheque['Chequeinterese'] as $chequeinterese): ?>
		<tr>
			<td><?php echo $chequeinterese['id']; ?></td>
			<td><?php echo $chequeinterese['montocheque']; ?></td>
			<td><?php echo $chequeinterese['montodescuentointeres']; ?></td>
			<td><?php echo $chequeinterese['montoentregado']; ?></td>
                                    
                        <td><?php 
                        if($chequeinterese['estadocheque']==1)
                            echo "Por cobrar";
                        else
                            if($chequeinterese['estadocheque']==0)
                                echo "Devuelto";
                            else
                                echo 'cobrado';
                        ?></td>
			<td><?php echo $chequeinterese['created']; ?></td>
			<td><?php echo $chequeinterese['cheque_id']; ?></td>
			<td><?php echo $chequeinterese['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chequeinterese', 'action' => 'view', $chequeinterese['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chequeinterese', 'action' => 'edit', $chequeinterese['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chequeinterese', 'action' => 'delete', $chequeinterese['id']), null, __('Are you sure you want to delete # %s?', $chequeinterese['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gestiondecobranzas'); ?></h3>
	<?php if (!empty($cheque['Gestiondecobranza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cheque['Gestiondecobranza'] as $gestiondecobranza): ?>
		<tr>
			<td><?php echo $gestiondecobranza['id']; ?></td>
			<td><?php echo $gestiondecobranza['created']; ?></td>
			<td><?php echo $gestiondecobranza['descripcion']; ?></td>
			<td><?php echo $gestiondecobranza['cheque_id']; ?></td>
			<td><?php echo $gestiondecobranza['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gestiondecobranzas', 'action' => 'view', $gestiondecobranza['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gestiondecobranzas', 'action' => 'edit', $gestiondecobranza['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gestiondecobranzas', 'action' => 'delete', $gestiondecobranza['id']), null, __('Are you sure you want to delete # %s?', $gestiondecobranza['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Gestion de cobranza'), array('controller' => 'gestiondecobranzas', 'action' => 'add',$cheque['Cheque']['id'])); ?> </li>
		</ul>
	</div>
</div>
<?php if($cheque['Cheque']['cobrado']==0){ ?>
<div class="related">
	<h3><?php echo __('Related Pagos'); ?></h3>
	<?php if (!empty($cheque['Pago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Edodeuda'); ?></th>
		<th><?php echo __('Pagointerese Deuda'); ?></th>
		<th><?php echo __('Chequeinterese Id'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('Cheque Estadocheque Id'); ?></th>
		<th><?php echo __('Tipopago Id'); ?></th>
		<th><?php echo __('Pagotercero Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cheque['Pago'] as $pago): ?>
		<tr>
			<td><?php echo $pago['id']; ?></td>
			<td><?php echo $pago['cliente_id']; ?></td>
			<td><?php echo $pago['created']; ?></td>
			<td><?php echo $pago['modified']; ?></td>
			<td><?php echo $pago['monto']; ?></td>
			<td><?php echo $pago['conceptode']; ?></td>
			<td><?php echo $pago['edodeuda']; ?></td>
			<td><?php echo $pago['pagointerese_deuda']; ?></td>
			<td><?php echo $pago['chequeinterese_id']; ?></td>
			<td><?php echo $pago['cheque_id']; ?></td>
			<td><?php echo $pago['cheque_estadocheque_id']; ?></td>
			<td><?php echo $pago['tipopago_id']; ?></td>
			<td><?php echo $pago['pagotercero_id']; ?></td>
			<td><?php echo $pago['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagos', 'action' => 'view', $pago['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagos', 'action' => 'edit', $pago['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagos', 'action' => 'delete', $pago['id']), null, __('Are you sure you want to delete # %s?', $pago['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Pago'), array('controller' => 'pagos', 'action' => 'add/'.$cheque['Cheque']['id'].'/1/'.$cheque['Cheque']['cobrado'],$cheque['Cliente']['id'])); ?> </li>
		</ul>
	</div>
</div>
<?php } ?>
<div class="related">
	<h3><?php echo __('Lista de Pago terceros'); ?></h3>
	<?php if (!empty($cheque['Pagotercero'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha creación'); ?></th>
		<th><?php echo __('Dia'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Conceptode'); ?></th>
		<th><?php echo __('Origen'); ?></th>
		<th><?php echo __('Destino'); ?></th>
		<th><?php echo __('Cheque Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($cheque['Pagotercero'] as $pagotercero): ?>
		<tr>
			<td><?php echo $pagotercero['id']; ?></td>
			<td><?php echo $pagotercero['created']; ?></td>
			<td><?php echo $pagotercero['dia']; ?></td>
			<td><?php echo $pagotercero['monto']; ?></td>
			<td><?php echo $pagotercero['conceptode']; ?></td>
			<td><?php echo $pagotercero['cliente_id']; ?></td>
			<td><?php echo $pagotercero['cliente_id1']; ?></td>
			<td><?php echo $pagotercero['cheque_id']; ?></td>
			<td><?php echo $pagotercero['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pagoterceros', 'action' => 'view', $pagotercero['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagoterceros', 'action' => 'edit', $pagotercero['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagoterceros', 'action' => 'delete', $pagotercero['id']), null, __('Are you sure you want to delete # %s?', $pagotercero['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Pago terceros'), array('controller' => 'pagoterceros', 'action' => 'add/'.$cheque['Cheque']['id'],$cheque['Cliente']['id'])); ?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php  if($cheque['Cheque']['cobrado']==1)
                            echo $this->Html->link(__('Editar Cheque'), array('action' => 'edit', $cheque['Cheque']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Cheque'), array('action' => 'delete', $cheque['Cheque']['id']), null, __('Esta seguro que desea Borrar este registro # %s?', $cheque['Cheque']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Cheques'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cheque'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Bancos'), array('controller' => 'bancos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Banco'), array('controller' => 'bancos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Intereses'), array('controller' => 'interese', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Intereses'), array('controller' => 'interese', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Chequeinterese'), array('controller' => 'chequeinterese', 'action' => 'add')); ?> </li>
	</ul>
</div>

