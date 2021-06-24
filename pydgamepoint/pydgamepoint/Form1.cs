using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace pydgamepoint
{
    public partial class Form1 : Form
    {

        public Bitmap gun = Resource1.gun,
            ghost = Resource1.ghost;  //создание полей для рисовки  в Form1_Paint

        private Point _ghostPosition = new Point(350,300); //позиция призрака
        private Point _direction = Point.Empty; //создание направления 
        private int _score = 0;

        public Form1()
        {
            InitializeComponent();

            SetStyle(ControlStyles.OptimizedDoubleBuffer | ControlStyles.AllPaintingInWmPaint | ControlStyles.UserPaint, true);
            //для того , чтобы не происходило мерцания и фиксировались объекты
            UpdateStyles();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            Refresh();   //создание таймера для перересовки наших объектов
        }

        private void timer2_Tick(object sender, EventArgs e) // таймер для движения призрака в центре в и ранщдомные стороны
        {
            Random r = new Random();

            timer2.Interval = r.Next(25, 700); //интервал перемещения
            _direction.X = r.Next(-1,2);
            _direction.Y = r.Next(-1,2);
                 
        }

        private void score_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Paint(object sender, PaintEventArgs e)
        {
            Graphics g = e.Graphics; //создание объекта

            var localposition = this.PointToClient(Cursor.Position);
            //получение текущей позиции курсора и перевод в пространство формы с пространства экрана 

            _ghostPosition.X += _direction.X * 10 ;// создание перемещения
            _ghostPosition.Y += _direction.Y * 10 ;


            if(_ghostPosition.X < 10 || _ghostPosition.X > 750) // создаем ограниченную область для призрака, чтобы за рамки программы не уходил
            {
                _direction.X *= -1;
            }
            if (_ghostPosition.Y < 10 || _ghostPosition.Y > 450)
            {
                _direction.Y *= -1;

            }

            //создаем метод, в котором сможем вычислить ,
            //когда мышка достигает центра позиции призрака, с помощью теоремы пифагора, найдя гипотенузу
            Point between = new Point(localposition.X - _ghostPosition.X, localposition.Y - _ghostPosition.Y);
            float distance = (float)Math.Sqrt((between.X * between.X) + (between.Y * between.Y));//нужен квадратный корень, используем библиотеку math

            if (distance < 20 )//задаем дистанцию для самих очков
            {
                AddScore(1);
            }

            var Gunpos = new Rectangle(localposition.X - 35, localposition.Y - 35, 85, 85);
            var Ghostpos = new Rectangle(_ghostPosition.X - 35, _ghostPosition.Y - 35, 50, 50);

            g.DrawImage(gun, Gunpos);
            g.DrawImage(ghost, Ghostpos);// создание двух объектов для игры

        }

       

       

        //создание подсчета очков 
        private void AddScore(int score)
        {
            _score += score;
            points.Text = _score.ToString(); // вывод нашего текста (очков)\

         
        }
    }
}
