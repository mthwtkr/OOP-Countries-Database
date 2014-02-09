<?php
	class HTML_Helper
	{
		public function print_table($assoc_array)
		{
			echo "
				<table>
					<thead>
						<tr>";
			foreach ($assoc_array as $key => $value) 
			{
				echo "<th>{$key}</th>";
			}
			echo "		</tr>
					</thead>
					<tbody>
						<tr>";
			foreach ($assoc_array as $key => $value) 
			{
				echo "<td>{$value}</td>";
			}
			echo "		</tr>
					</tbody>
				</table>";
		}

		public function print_select($name, $array)
		{
			echo "<select name='{$name}'>";
			foreach ($array as $key => $value) 
			{
				echo "<option value='{$value['id']}'>{$value['name']}</option>";
			}
			echo "</select>";
		}
	}
?>
