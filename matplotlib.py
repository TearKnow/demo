import matplotlib.pyplot as plt
#from matplotlib import pyplot as plt 貌似与上面一样
from matplotlib import animation

import numpy as np
from mpl_toolkits.mplot3d import Axes3D
import matplotlib.gridspec as gridspec




# 1. line 直线
# x=np.linspace(-1,1,50)
# y=x*x
#
# plt.figure()
# plt.plot(x,y)
#
# plt.show()


# 2. scatter 散点图
# n = 1024
# X = np.random.normal(0, 1, n)
# Y = np.random.normal(0, 1, n)
# T = np.arctan2(Y, X) # for color value
#
# plt.scatter(X, Y, s=75, c=T, alpha=0.5)
#
# plt.xlim((-1.5, 1.5))
# plt.ylim((-1.5, 1.5))
#
# plt.show()


# 3. bar 柱状图
# n = 12
# X = np.arange(n)
# Y1 = (1 - X/float(n)) * np.random.uniform(0.5, 1, n)
# Y2 = (1 - X/float(n)) * np.random.uniform(0.5, 1, n)
#
# plt.bar(X, +Y1, facecolor='#9999ff', edgecolor='white')
# plt.bar(X, -Y2)
#
# for x, y in zip(X, Y1):
#     plt.text(x - 0.45, y + 0.05, '%.2f' % y)


# 4. contours 等高线
# 见onedrive 中 FireShot Capture 001 - Numpy中Meshgrid函数介绍及2种应用场景 - 蘭亭客 - 博客园 - www.cnblogs.com
# def f(x, y):
#     return (1 - x/2 + x**5 + y**3) * np.exp(-x**2 -y**2)
#
# n = 256
# x = np.linspace(-3, 3, n)
# y = np.linspace(-3, 3, n)
# X,Y = np.meshgrid(x, y)
# plt.contourf(X, Y, f(X, Y), 8, alpha=0.75, cmap=plt.cm.hot)
#
# C = plt.contour(X, Y, f(X, Y), 8, colors='black', linewidths=0.5) #显示每条等高线，不然都在一起
# plt.clabel(C, inline=True, fontsize=10)
#
# #plt.plot(X, Y, marker='.', color='blue', linestyle='none')#查看meshgrid的作用，就是x * y，比如6 * 2 就是12个点了
# #plt.show()



# 5. Image 图像
# a = np.array([0.3134345, 0.365335, 0.42456456,
#               0.3654841, 0.439951, 0.52501123,
#               0.4237123, 0.525488, 0.65148975]).reshape(3, 3)
# plt.imshow(a, interpolation='nearest', cmap='bone', origin='lower')
# plt.colorbar()


# 6. 3D图像 X,Y,Z 分别 长宽高
# fig = plt.figure()
# ax = Axes3D(fig)
# X = np.arange(-4, 4, 0.25)
# Y = np.arange(-4, 4, 0.25)
# X, Y = np.meshgrid(X, Y)
# R = np.sqrt(X ** 2 + Y**2)
# Z = np.sin(R)
#
# ax.plot_surface(X, Y, Z, rstride=1, cstride=1, cmap=plt.get_cmap('rainbow'))
# ax.contourf(X, Y, Z, zdir='z', offset=-2, cmap='rainbow')
# ax.set_zlim(-2, 2)


# 7. subplot, figure 里有多个小图

# 7.1
# plt.figure()
# plt.subplot(2, 2, 1) #2行2列 ，第1个位置打印一个
# plt.plot([0, 1], [0, 1])
#
# plt.subplot(2, 2, 2) #2行2列 ，第2个位置打印一个
# plt.plot([0, 1], [0, 2])

# 7.2
# plt.figure()
# ax1 = plt.subplot2grid((3, 3), (0, 0), colspan=3, rowspan=1)
# ax1.plot([1,2], [1, 2])
# ax1.set_title('ax1_title')
#
# ax2 = plt.subplot2grid((3, 3), (1, 0), colspan=2, rowspan=1)
# ax2.plot([1,2], [1, 2])
#
# ax3 = plt.subplot2grid((3, 3), (1, 2), rowspan=2)
# ax3.plot([1,2], [1, 2])
#
# ax4 = plt.subplot2grid((3, 3), (2, 0), colspan=2, rowspan=1)
# ax4.plot([1,2], [1, 2])

# 7.3
# plt.figure()
# f,((ax11, ax12), (ax21, ax22)) = plt.subplots(2, 2, sharex=True, sharey=True)
# ax11.scatter([1,2], [1,2])


# 8 图中图
# fig = plt.figure()
# x = [1, 2, 3, 4, 5, 6, 7]
# y = [1, 3, 4, 2, 5, 8, 6]
#
# left, bottom, width, height = 0.1, 0.1, 0.8, 0.8
# ax1 = fig.add_axes([left, bottom, width, height])
# ax1.plot(x, y, 'r')
# ax1.set_title('title')
#
# left, bottom, width, height = 0.2, 0.6, 0.25, 0.25
# ax2 = fig.add_axes([left, bottom, width, height])
# ax2.plot(y, x, 'b')
# ax2.set_title('title inside')
#
# plt.axes([0.6, 0.2, 0.25, 0.25])
# plt.plot(y, x, 'g')
# plt.title('different method')


# 9 次坐标轴
# x = np.arange(0, 10, 0.1)
# y1 = 0.05 * x**2
# y2 = -1 * y1
#
# fig, ax1 = plt.subplots()
# ax2 = ax1.twinx()
# ax1.plot(x, y1, 'g-')
# ax2.plot(x, y2, 'b-')
#
# ax1.set_xlabel('X data')
# ax1.set_ylabel('Y1', color='g')
# ax2.set_ylabel('Y2', color='b')


# 10 动画 Animation
fig, ax = plt.subplots()
x = np.arange(0, 2*np.pi, 0.01)
line, = ax.plot(x, np.sin(x))

def animate(i):
    line.set_ydata(np.sin(x + i/30))
    return line,

def init():
    line.set_ydata(np.sin(x))
    return line,


ani = animation.FuncAnimation(fig=fig, func=animate, frames=100, init_func=init, interval=20, blit=False)#mac blit 必须false



plt.show()
