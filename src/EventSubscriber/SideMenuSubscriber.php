<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 19/11/2018
 * Time: 14:53
 */

namespace App\EventSubscriber;


use App\Utils\UtilClass;
use KevinPapst\AdminLTEBundle\Event\SidebarMenuEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use KevinPapst\AdminLTEBundle\Model\MenuItemModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SideMenuSubscriber implements EventSubscriberInterface
{

	/**
	 * Returns an array of event names this subscriber wants to listen to.
	 *
	 * The array keys are event names and the value can be:
	 *
	 *  * The method name to call (priority defaults to 0)
	 *  * An array composed of the method name to call and the priority
	 *  * An array of arrays composed of the method names to call and respective
	 *    priorities, or 0 if unset
	 *
	 * For instance:
	 *
	 *  * array('eventName' => 'methodName')
	 *  * array('eventName' => array('methodName', $priority))
	 *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
	 *
	 * @return array The event names to listen to
	 */
	final public static function getSubscribedEvents(): array
	{
		return [
			ThemeEvents::THEME_SIDEBAR_SETUP_MENU => ['onSetupMenu', 200]
		];
	}

	final public function onSetupMenu(SidebarMenuEvent $menuEvent): void
	{
		$setup = (new MenuItemModel('setup', 'Setup',null, [], 'fa fa-cogs'))
			->addChild(new MenuItemModel('initialSetup', 'Initial Setup', 'admin_setup', [], 'fa fa-cog'))
			->addChild(new MenuItemModel('syllabusConfig', 'Syllabus Config', 'placeholder_page', [], 'fa fa-cog'))
			->addChild(
				(new MenuItemModel('users', 'Users', null, [], 'fa fa-users'))
					->addChild(new MenuItemModel('userStudents', 'Students', 'placeholder_page', [], 'fa fa-times-circle'))
					->addChild(new MenuItemModel('userTeachers', 'Teachers', 'placeholder_page', [], 'fa fa-times-circle'))
					->addChild(new MenuItemModel('assignClasses', 'Assign Classes', 'placeholder_page', [], 'fa fa-times-circle'))
					->addChild(new MenuItemModel('userAccess', 'User Access', 'placeholder_page', [], 'fa fa-times-circle'))
					->addChild(new MenuItemModel('admission', 'Student Admission', 'placeholder_page', [], 'fa fa-times-circle'))
			);

		$calendar = (new MenuItemModel('calendar', 'Calendar',null, [], 'fa fa-calendar-alt', UtilClass::getDate(), 'red'))
			->addChild(new MenuItemModel('events', 'Events', 'placeholder_page', [], 'fa fa-times-circle'))
			->addChild(new MenuItemModel('holidayEvents', 'Holiday Events', 'placeholder_page', [], 'fa fa-calendar'));

		$tests = (new MenuItemModel('tests', 'Tests', null, [], 'fa fa-file-alt'))
			->addChild(new MenuItemModel('testResults', 'Test results', 'placeholder_page'))
			->addChild(new MenuItemModel('exams', 'Exams', 'placeholder_page'))
			->addChild(new MenuItemModel('performance', 'Performance', 'placeholder_page'));

		$profile = new MenuItemModel('userProfile', 'Profile', 'placeholder_page', [], 'fa fa-th', 'manage', 'green');

		$attendance = (new MenuItemModel('attendance', 'Attendance', null, [], 'fa fa-chart-bar', 'daily', 'orange'))
			->addChild(new MenuItemModel('studentsAttendance', 'Students', 'placeholder_page'))
			->addChild(new MenuItemModel('teachersAttendance', 'Teachers', 'placeholder_page'))
			->addChild(new MenuItemModel('studentReportAttendance', 'Student\'s Report', 'placeholder_page'))
			->addChild(new MenuItemModel('teacherReportAttendance', 'Teacher\'s Report', 'placeholder_page'));

		$timetable = (new MenuItemModel('timeTable', 'TimeTable', null, [], 'fa fa-table'))
			->addChild(new MenuItemModel('generateTimeTable', 'Generate', 'placeholder_page'))
			->addChild(new MenuItemModel('viewTimeTable', 'View', 'placeholder_page'));

		$transcripts = (new MenuItemModel('transcripts', 'Transcripts', 'placeholder_page', [], 'fa fa-edit'))
			->addChild(new MenuItemModel('generateReportCard', 'Generate Report Card', 'placeholder_page'))
			->addChild(new MenuItemModel('processedReportCard', 'Processed Report Cards', 'placeholder_page'))
			->addChild(new MenuItemModel('summarizedTranscripts', 'Summarized Transcripts', 'placeholder_page'))
			->addChild(new MenuItemModel('unebResults', 'UNEB results', 'placeholder_page'));

		$finance = (new MenuItemModel('finance', 'Finance', 'placeholder_page', [], 'far fa-credit-card', '$', 'green'))
			->addChild(new MenuItemModel('studentsFees', 'Student\'s Fees', 'placeholder_page', [], 'fa fa-plus-circle'))
			->addChild(new MenuItemModel('salary', 'Salary', 'placeholder_page', [], 'fa fa-minus-circle'))
			->addChild(new MenuItemModel('expenses', 'Expenses', 'placeholder_page', [], 'fas fa-bars'));

		$complaints = new MenuItemModel('complaints', 'Complaints', 'placeholder_page', [], 'fas fa-comments', 'check', 'red');

		$menuEvent->addItem($setup);
		$menuEvent->addItem($calendar);
		$menuEvent->addItem($tests);
		$menuEvent->addItem($profile);
		$menuEvent->addItem($attendance);
		$menuEvent->addItem($timetable);
		$menuEvent->addItem($transcripts);
		$menuEvent->addItem($finance);
		$menuEvent->addItem($complaints);

		$this->activateByRoute($menuEvent->getRequest()->get('_route'), $menuEvent->getItems());
	}

	/**
	 * @param string $route
	 * @param MenuItemModel[] $items
	 */

	final public function activateByRoute($route, $items): void
	{
		foreach ($items as $item) {
			if ($item->hasChildren()) {
				$this->activateByRoute($route, $item->getChildren());
			} elseif ($item->getRoute() === $route) {
				$item->setIsActive(true);
			}
		}
	}
}
