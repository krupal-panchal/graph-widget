import React, {useState} from 'react';
import GraphUI from './GraphUI';
import { __ } from '@wordpress/i18n';

const GraphWidget = () => {

	const [expenseDuration, setExpenseDuration] = useState('7d');

	const handleExpenseDuration = (event) => {
		setExpenseDuration(event.target.value);
	}

	// Dropdown options.
	const optionsData = [
		{ 'name' : __( 'Last 7 Days', 'graph-widget' ), 'value' : '7d' },
		{ 'name' : __( '15 Days', 'graph-widget' ), 'value' : '15d' },
		{ 'name' : __( '1 Month', 'graph-widget' ), 'value' : '1m' }
	];

	return (
		<div>
			<div className="graph-top-block">
				<span className="graph-title">{__( 'Expense Data', 'graph-widget' )}</span>
				<select name="expense" id="expenseDuration" value={expenseDuration} onChange={handleExpenseDuration}>
					{
						optionsData.map(
							item => (
								<option value={item.value}>{item.name}</option>
							)
						)
					}
				</select>
			</div>
			< hr />
			<GraphUI duration={expenseDuration}/>
		</div>
	);
}

export default GraphWidget;