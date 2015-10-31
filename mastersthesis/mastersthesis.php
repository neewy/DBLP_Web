<?php session_start();
	if(isset($_SESSION['login_user'])){ ?>
<div class="datatable_wrapper" style="display:none">
                   <form class="pure-form">
                        <fieldset>
                            <legend id="top-legend">Showing 50 results with offset <?php echo($_SESSION['mastersthesis_offset']);?></legend>

                             <label for="mastersthesis-field">Field</label>
                            <select id="mastersthesis-field">
                                <option>Key</option>
                                <option value="mdate">Date</option>
                                <option>Title</option>
                                <option>Year</option>
                                <option>School</option>
                            </select>
                            <input type="text" id="mastersthesis-search-value" class="pure-input-1-3" placeholder="Search value">
                            <label for="mastersthesis-match">
                                <input id="mastersthesis-match" type="checkbox"> Exact match
                            </label>
                            <a id="mastersthesis_search" class="pure-button pure-button-primary">Search</a>
                        </fieldset>
                    </form>			
    <table id="sortTable" class="datatable pure-table pure-table-bordered tablesorter">
					<thead>
						<tr>
							<th>Date</th>
							<th>Title</th>
							<th>Year</th>
							<th>School</th>
						</tr>
					</thead>
					<tbody id="datatable_body">
					</tbody>
				</table>
			</div>
<?php } else {
		echo("<h2>Please, log into the system</h2>");
	} ?>