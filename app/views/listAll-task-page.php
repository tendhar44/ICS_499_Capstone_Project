
<div class="container" id="info">
	<h3>All Tasks</h3>
	<br>
	<div id="listAll-property">    	
		<button id="createTaskButton" type="button" class="btn btn-primary">Create Task</button>

		<form id="taskForm" class="form-horizontal" action="/home_maintenance_manager/public/taskcontroller/listAll/<?php echo $_SESSION['userid']; ?>" method="post">

			<div class="form-group">
				<label class="control-label col-sm-4" for="propertyList">Select Property:</label>
				<div class="col-sm-12">
					<select class="form-control" id="propertySelector" required=>
						<option value="" disabled selected>Select Property</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="applianceSelector">Select Appliance:</label>
				<div class="col-sm-12">
					<select class="form-control" name="appId" id="applianceSelector" disabled required>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="taskName">Task Name:</label>
				<div class="col-sm-12">
					<input class="form-control" name="taskName" id="taskName" placeholder="Enter Task Name" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="taskDue">Task Due Date:</label>
				<div class="col-sm-12">
					<input type="date" class="form-control" name="taskDue" id="taskDue" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4">Repeat Task:</label>
				<div class="col-sm-12">
					<input type="radio" name="repeatTask" value="1">&nbsp; Yes &nbsp; &nbsp;
					<input type="radio" name="repeatTask" value="0" checked="checked">&nbsp; No
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="intervalDay">Interval Days:</label>
				<div class="col-sm-12">
					<input type="number" class="form-control" name="intervalDay" id="intervalDay">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="taskReminder">Reminder Date:</label>
				<div class="col-sm-12">
					<input type="date" class="form-control" name="taskReminder" id="taskReminder">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="reminderInterval">Reminder Interval Days:</label>
				<div class="col-sm-12">
					<input type="number" class="form-control" name="reminderInterval" id="reminderInterval">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-4" for="taskDes">Description:</label>
				<div class="col-sm-12">
					<textarea name="taskDes" class="form-control" id="taskDes"></textarea>
				</div>
			</div>

			<input type="hidden" name="taskComplete" value="0">
			
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addTask" value="AddTask" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form> 

		<?php
		echo $_SESSION['outputCotent'];
		?>
	</div><!-- close list-property -->
</div><!-- close container -->


<script>
$(function() {

	var properties = <?= json_encode($data["dropDownData"]) ?>;

	console.log(properties);	
	var $propertySelector = $('#propertySelector');
	var $applianceSelector = $('#applianceSelector');

	// populate property selector.
	for (key in properties) {
		console.log(key);
		$propertySelector.append('<option>' + key + '</option>');
	}

	$('#createTaskButton').on('click', function(){
		$('.form-horizontal').fadeToggle(200);
	});

	// update appliance selector on change value from property selector
	$('#propertySelector').on('change', function(event, value) {
		console.log($(this).val());

		var selectedValue = $(this).val();

		if (selectedValue === 'Select Property') {
			// clear value
			// disable the appliance select
			$applianceSelector.val('select property first').prop('disabled', true);
			return;
		}
		// clear options in appliance selector
		$applianceSelector.empty();

		for (key in properties[selectedValue]) {
			$applianceSelector.append('<option value="' + properties[selectedValue][key] + '">' + key + '</option>');
		}

		$applianceSelector.prop('disabled', false);
	});

});

</script>
