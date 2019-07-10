cmake_minimum_required(VERSION 3.0.0)
project(dtlffi VERSION 0.1.0)
set(CMAKE_LIBRARY_OUTPUT_DIRECTORY ../lib)

include_directories(./DungeonTemplateLibrary/include)
add_library(${PROJECT_NAME} SHARED ./maze.cpp)
